
<x-app-layout title="Instagram Analysis">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-md-6 col-sm-9 col-12">
                    <div class="input-affix m-b-10">
                        <div class="container-fluid">
                            <div class="card shadow" id="ChannelMainDiv">
                                <div class="card shadow" id="highlights">
                                    <div class="card-header p-15 ml-3">
                                        <label class="h3 m-0">
                                            Highlights</label>
                                    </div>

                                <div class="row p-50">
                                    <div class="col-md-2 col-12">
                                        <img class="rounded-circle lazyload" id="c1ChannelProfileImage" width="100%" height="auto" />
                                    </div>
                                    <div class="col-md-10 col-12 pl-5">
                                        <div class="row mt-4">
                                            <div class="col">
                                                <label class="h1 font-weight-bold" id="c1ChannelName"></label>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <span class="text-red"><i class="anticon anticon-youtube"></i> Followers</span>
                                                <br>
                                                <label id="c1ChannelViews" class="font-weight-bold"></label>
                                            </div>
                                            <div class="col">
                                                <span class="text-red"><i class="anticon anticon-youtube"></i> Subscriber</span>
                                                <br>
                                                <label id="c1ChannelSubscriber" class="font-weight-bold"></label>
                                            </div>
                                            <div class="col">
                                                <span class="text-red"><i class="anticon anticon-youtube"></i> Videos</span>
                                                <br>
                                                <label id="c1ChannelVideos" class="font-weight-bold"></label>
                                            </div>
                                            <div class="col">
                                                <span class="text-red"><i class="anticon anticon-youtube"></i> Joining Date</span>
                                                <br>
                                                <label id="c1ChannelJoiningDate" class="font-weight-bold"></label>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <span class="text-red"><i class="anticon anticon-unordered-list"></i> Category</span>
                                                <br>
                                                <label id="c1ChannelCategory" class="font-weight-bold"></label>
                                            </div>
                                            <div class="col">
                                                <span class="text-red"><i class="anticon anticon-flag"></i> Country</span>
                                                <br>
                                                <label id="c1ChannelCountry" class="font-weight-bold"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

