<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PlanoController extends Controller
{

    protected $apiUrl = "http://api1.company.test/api/";
    protected $apiToken = "NwvAYnB0GS9QMI2gRg3gHqwT9mdPBeSkHFlqsD0t";

    public function index() {
        return view('content.tvPlans.index');
    }

    public function show(int $id) {
        $client = new Client;
        $request = $client->get($this->apiUrl . 'planos/' . $id);
        $response = json_decode($request->getBody());
        $data = $response->data;
        return view('content.tvPlans.show', compact('data'));
    }

    public function create() {
        return view('content.tvPlans.create');
    }

    public function store(Request $request) {
        $request['_token'] = $this->apiToken;

        $client = new Client;
        $request = $client->post($this->apiUrl . 'planos', [
            'form_params' => $request->all()
        ]);
        $response = json_decode($request->getBody());

        if ($response->type == 'success') {
            return redirect()
                ->route('tv_plans.index')
                ->with('message', ['type' => 'success', 'msg' => $response->msg]);
        } 
        
        return redirect()
                ->route('tv_plans.index')
                ->with('message', ['type' => 'danger', 'msg' => $response->msg]);
    }

    public function edit(int $id) {
        $client = new Client;
        $request = $client->get($this->apiUrl . 'planos/' . $id);
        $response = json_decode($request->getBody());
        $data = $response->data;

        return view('content.tvPlans.edit', compact('data'));
    }

    public function update(Request $request) {
        $request['_token'] = $this->apiToken;

        $client = new Client;
        $apiRequest = $client->put($this->apiUrl . 'planos/' . $request['id'], [
            'form_params' => $request->all()
        ]);
        $response = json_decode($apiRequest->getBody());

        if ($response->type == 'success') {
            return redirect()
                ->route('tv_plans.show', $request['id'])
                ->with('message', ['type' => 'success', 'msg' => $response->msg]);
        } 
        
        return redirect()
                ->route('tv_plans.index')
                ->with('message', ['type' => 'danger', 'msg' => $response->msg]);
    }

    public function destroy(int $id) {
        $request['_token'] = $this->apiToken;

        $client = new Client;
        $apiRequest = $client->delete($this->apiUrl . 'planos/' . $id);
        $response = json_decode($apiRequest->getBody());

        return redirect()->route('tv_plans.index');
    }
}
