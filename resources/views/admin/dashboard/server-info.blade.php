@section('custom-scripts')
    <script>
        var refresh_interval_for_cpu_info = 1000;
        var refresh_interval_for_memory_info = 3000;

        $(document).ready(function() {
            function loadMemoryInfo() {
                $.ajax({
                    url: '{{ route("admin.system.getMemoryInfo") }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $("#memoryInfo").html(data);
                    }
                });
            }

            function loadCPUInfo() {
                $.ajax({
                    url: '{{ route("admin.system.getCPUInfo") }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $("#CPUInfo").html(data);
                    }
                });
            }

            loadCPUInfo();
            var CPUInfoLoader = setInterval(loadCPUInfo, refresh_interval_for_cpu_info);

            $('#refreshIntervalForCPUInfo').change(function() {
                refresh_interval_for_cpu_info = $('#refreshIntervalForCPUInfo').val();
                clearInterval(CPUInfoLoader);
                CPUInfoLoader = setInterval(loadCPUInfo, refresh_interval_for_cpu_info);
            });

            loadMemoryInfo();
            var memoryInfoLoader = setInterval(loadMemoryInfo, refresh_interval_for_memory_info);

            $('#refreshIntervalForMemoryInfo').change(function() {
                refresh_interval_for_memory_info = $('#refreshIntervalForMemoryInfo').val();
                clearInterval(memoryInfoLoader);
                memoryInfoLoader = setInterval(loadMemoryInfo, refresh_interval_for_memory_info);
            });
        });
    </script>
@endsection

<x-admin.app-layout pageHeader=0>
    <div class="card border-top border-0 border-4 border-success">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <h5 class="mb-0 text-success">{{ __('Resource Monitor') }}</h5>
                </div>
                <div class="d-flex align-items-center flex-shrink-1 pointer">
                    <select class="select2" id="refreshIntervalForCPUInfo">
                        <option value=500>500 ms</option>
                        <option value=1000 selected>1 Sec</option>
                        <option value=2000>2 Sec</option>
                        <option value=3000>3 Sec</option>
                        <option value=5000>5 Sec</option>
                        <option value=10000>10 Sec</option>
                        <option value=15000>15 Sec</option>
                        <option value=30000>30 Sec</option>
                        <option value=60000>1 Min</option>
                    </select>
                </div>
            </div>
            <hr>
            <div id="CPUInfo"></div>
        </div>
    </div>

    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <h5 class="mb-0 text-primary">{{ __('Memory Information') }}</h5>
                </div>
                <div class="d-flex align-items-center flex-shrink-1 pointer">
                    <select class="select2" id="refreshIntervalForMemoryInfo">
                        <option value=500>500 ms</option>
                        <option value=1000>1 Sec</option>
                        <option value=2000>2 Sec</option>
                        <option value=3000 selected>3 Sec</option>
                        <option value=5000>5 Sec</option>
                        <option value=10000>10 Sec</option>
                        <option value=15000>15 Sec</option>
                        <option value=30000>30 Sec</option>
                        <option value=60000>1 Min</option>
                    </select>
                </div>
            </div>
            <hr>
            <div id="memoryInfo"></div>
        </div>
    </div>
</x-admin.app-layout>