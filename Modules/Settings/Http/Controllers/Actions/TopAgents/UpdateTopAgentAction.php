<?php

namespace Modules\Settings\Http\Controllers\Actions\TopAgents;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use Modules\Settings\AgentSocials;
use Modules\Settings\TopAgent;
use Modules\Settings\Http\Resources\TopAgents\TopAgentResource;

class UpdateTopAgentAction
{
    function execute($id, $data)
    {
        if(isset($data['image']) && is_file($data['image'])){
            $data['image'] = $data['image']->store('/top_agents', 'public');
        }
        // Find top_agent
        $top_agent = TopAgent::find($id);

        // Update top_agent 
        $top_agent->update($data);


        // Return transformed response
        return new TopAgentResource($top_agent);
    }
}
