<?php

namespace App\Imports\Admin;

use App\Http\Requests\Admin\AdminPermissions\StorePermissionRequest;
use App\Models\AdminPermission;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class PermissionsImport implements OnEachRow
{
    /**
     * @param Row $row
     */
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        if (!empty($row[0])) {
            $request = new StorePermissionRequest();
            $validator = Validator::make([
                'name' => $row[0] ?? '',
                'slug' => $row[1] ?? '',
            ], $request->rules());

            if (!$validator->fails()) {
                AdminPermission::create($validator->validated());
            }
        }
    }
}
