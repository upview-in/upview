<?php

namespace App\Exports\User;

use App\Models\UserPermission;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPermissions implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return UserPermission::select(['name', 'slug', 'enabled'])->get()->each->makeHidden(['_id']);
    }
}
