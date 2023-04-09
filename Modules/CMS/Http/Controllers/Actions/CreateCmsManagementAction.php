<?php

namespace Modules\CMS\Http\Controllers\Actions;

use Modules\CMS\CmsManagement;
use Modules\CMS\CmsManagementTranslation;
use Modules\CMS\Http\Resources\CmsManagementResource;

class CreateCmsManagementAction
{
    function execute($data, $translations = null)
    {

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = $data['image']->store('informations', 'public');
        }

        if (isset($data['magazine_logo']) && is_file($data['magazine_logo'])) {
            $data['magazine_logo'] = $data['magazine_logo']->store('informations', 'public');
        }
        $cms_management = CmsManagement::create($data);

        // Load CmsManagement translations
        return new CmsManagementResource(CmsManagement::find($cms_management->id));
    }
}
