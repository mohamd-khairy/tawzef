<?php

namespace Modules\CMS\Http\Controllers\Actions;


use Modules\CMS\CmsManagement;
use Modules\CMS\CmsManagementTranslation;
use Modules\CMS\Http\Resources\CmsManagementResource;

class UpdateCmsManagementAction
{
    function execute($id, $data)
    {
        // Get cms management
        $cms_management = CmsManagement::find($id);

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = $data['image']->store('informations', 'public');
        }

        if (isset($data['magazine_logo']) && is_file($data['magazine_logo'])) {
            $data['magazine_logo'] = $data['magazine_logo']->store('informations', 'public');
        }
        // Update cms management (Must be triggered after translation update to trigger the update event for cache clear)
        $cms_management->update($data);

        return new CmsManagementResource($cms_management);
    }
}
