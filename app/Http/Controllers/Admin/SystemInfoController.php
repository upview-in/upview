<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Functions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Info\CPUInfoRequest;
use App\Http\Requests\Admin\Info\MemoryInfoRequest;
use Illuminate\Support\Str;

class SystemInfoController extends Controller
{
    public function getCPUInfo(CPUInfoRequest $request)
    {
        $cpu_usage = shell_exec('top -bn1 | grep "Cpu(s)" | sed "s/.*, *\([0-9.]*\)%* id.*/\1/" | awk \'{printf "CPUUsage: %.0f%%", (100 - $1)}\'');
        $used_memory = shell_exec('free | grep Mem | awk \'{printf "UsedMemory: %.0f%%", ($3/$2 * 100)}\'');
        $free_memory = shell_exec('free | grep Mem | awk \'{printf "FreeMemory: %.0f%%", ($4/$2 * 100)}\'');
        $disk_size = shell_exec('df / | awk \'FNR == 2 {printf "DiskSize: %s kb", $2}\'');
        $used_disk = shell_exec('df / | awk \'FNR == 2 {printf "UsedDisk: %s kb", $3}\'');
        $available_disk = shell_exec('df / | awk \'FNR == 2 {printf "AvailableDisk: %s kb", $4}\'');

        return $this->formateInfo([$cpu_usage, $used_memory, $free_memory, $disk_size, $used_disk, $available_disk]);
    }

    public function getMemoryInfo(MemoryInfoRequest $request)
    {
        $memory_info = explode('<br />', nl2br(shell_exec('cat /proc/meminfo')));

        return $this->formateInfo($memory_info);
    }

    public function formateInfo(array $data): string
    {
        $info = '<div class="row">';

        foreach ($data as $line) {
            if (empty(trim($line))) {
                continue;
            }

            list($key, $value) = explode(':', $line);

            $key = Functions::splitCamelCase(Str::replace('_', '', trim($key)));
            $splitted_values = explode(' ', trim($value));

            if (count($splitted_values) > 1 && Str::lower($splitted_values[1]) == 'kb') {
                $value = Functions::formatSizeUnits(($splitted_values[0] ?? 0) ? ($splitted_values[0] ?? 0) * 1024 : 0);
            }

            $info .= '<div class="col-lg-2 col-md-3 col-sm-4 col-12 mt-2 mb-2">
                <label class="w-100 text-wrap"><strong>' . $key . '</strong></label>
                <span class="w-100 text-wrap">' . $value . '</span>
            </div>';
        }
        $info .= '</div>';

        return $info;
    }
}

// run as root use "echo (password) | sudo -S (command)"
