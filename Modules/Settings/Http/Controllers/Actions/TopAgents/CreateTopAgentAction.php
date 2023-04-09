<?php

namespace Modules\Settings\Http\Controllers\Actions\TopAgents;

use Illuminate\Support\Facades\Lang;
use Modules\Settings\AgentSocials;
use Modules\Settings\TopAgent;
use Modules\Settings\Http\Resources\TopAgents\TopAgentResource;

class CreateTopAgentAction
{
    function execute($data)
    {
        $data['image'] = $data['image']->store('/top_agents', 'public');
        // Create top_agent
        $top_agent = TopAgent::create($data);

        // return transformed response
        return new TopAgentResource($top_agent);
    }
}
