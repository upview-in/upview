<?php

namespace App\Exports\Admin;

use App\Models\AdminPermission;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPermissions implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AdminPermission::select(['name', 'slug', 'enabled'])->get()->each->makeHidden(['_id']);
    }
}
