@section('path-navigation')
<a class="breadcrumb-item" href="#">Support</a>
<span class="breadcrumb-item active">Support History</span>
@endsection
@section('custom-scripts')
<script type="text/javascript">

function setQueryID(qurID) {
    $('#query_id').val(qurID);
    $('#closeRequest').modal('show');
}

function processCancelQueryRequest()
{
    var id = $('#query_id').val();
    var url = '{{ route("panel.user.support.cancelQueryByUser", ":id") }}';
    url = url.replace(':id', id);
    window.location= url;
}

</script>
@endsection

<x-app.app-layout title="Support History">
    <div class="container-fluid">
        <div class="card shadow" id="highlights">
            <div class="card-header p-15 ml-3 w-500">
				<label class="h3 m-0">Support History</label>
			</div>
            <div class="card-body p-15 ml-3">
                <div class="table-responsive">
                    {{-- Success Message Div --}}
                    @if(session()->get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    {{-- Success Message Div End --}}
                    <table class="table table-borderless" data-toggle="table" data-pagination="true" data-search="true">
                        <caption></caption>
                        <thead>
							<tr>
								<th scope="col" data-sortable="true">#</th>
								<th scope="col" data-sortable="true" data-field="name">Title</th>
								<th scope="col" data-sortable="true" data-field="email">Description</th>
								<th scope="col" data-sortable="true" data-field="linked_account">Status</th>
								<th scope="col" data-sortable="true" data-field="authorized_since">Assigned Executive</th>
								<th scope="col" data-sortable="true" data-field="status">Assigned On</th>
								<th scope="col" data-sortable="true" data-field="renew">Remarks</th>
								<th scope="col" data-sortable="true" data-field="resolved_on">Resolved On</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
                        <tbody>
                            @foreach($SupportHistory as $key => $history)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td class="justify-center">{{ $history->query_title }}</td>
                                    <td class="justify-center">{{ $history->query_description }}</td>
                                    <td class="justify-center">
                                        @if( $history->status == 0 )
                                            <span class="justify-center text-warning">Pending</span>
                                        @elseif( $history->status == 1 )
                                            <span class="justify-center text-blue">Assigned</span>
                                        @else
                                            <span class="justify-center text-success">Closed</span>
                                        @endif
                                    </td>
                                    <td class="justify-center">{{ $history->assigned_to ?? "N/A" }}</td>
                                    <td class="justify-center">{{ $history->assigned_on_date ?? "N/A" }}</td>
                                    <td class="justify-center">{{ $history->remark ?? "-" }}</td>
                                    <td class="justify-center">{{ $history->resolved_at ?? "N/A" }}</td>
                                    <td class="justify-center">
                                        @if($history->status == 1)
                                            <a href="{{ route('panel.user.support.supportChat') }}/?id={{ $history->id }}">
                                                <em class="fas fa-comments text-info justify-center font-size-20" data-toggle="tooltip" data-placement="bottom" title="Start Support Chat" aria-hidden="false" ></em>
                                            </a>
                                        @endif
                                        @if($history->status != 2)
                                            <a href="javascript:void(0)" onclick="setQueryID('{{ $history->id  }}')"  id="btnQueryId" data-id="{{ $history->id }}" data-toggle="modal">
                                                <em class="fas fa-times-circle text-danger justify-center font-size-20" data-toggle="tooltip" data-placement="bottom" title="Close Request" aria-hidden="false" ></em>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="closeRequest" tabindex="-1" role="dialog" aria-labelledby="closeRequestModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Close Request</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <div class="row">
                        <div class="col">
                            @csrf
                            <h5 >Are you sure you want to close the request?</h5>
                            <input type="hidden", name="query_id" id="query_id">
                        </div>
                    </div>
				</div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-md btn-primary w-25">No</a>
                    <button onclick="processCancelQueryRequest()" id="btnCancelQuery" class="btn btn-md btn-danger w-25 deleteQueryBtn">Yes</button>

                </div>
			</div>
		</div>
	</div>

</x-app.app-layout>


