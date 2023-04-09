<?php

namespace Modules\Settings\Http\Controllers\Actions\TopAgents;

use Modules\Settings\TopAgent;
use Modules\Settings\Http\Resources\TopAgents\TopAgentResource;
use Cache;
use App;

class GetTopAgentsAction
{
    public function execute()
    {
        $top_agents = TopAgent::all();

        // Transform the top_agents
        $top_agents = TopAgentResource::collection($top_agents);

        return $top_agents;
    }
}
