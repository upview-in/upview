
<x-app-layout title="Instagram Analysis">
    <div class="container-fluid">
        <div class="card">  
            <div class="row">
                <div class="col-12">
                    <div class="input-affix m-b-10">
                        <div class="container-fluid">
                            <div class="card shadow" id="ChannelMainDiv">
                                <div class="card shadow" id="highlights">
                                    <div class="card-header p-15 ml-3">
                                        <label class="h3 m-0">
                                            Highlights</label>
                                    </div>
                                    <div class="row p-80 row-lg">
                                        <div class="col-sm-2 col-12">
                                            <img class="rounded-circle lazyload" id="c1ChannelProfileImage" width="auto" height="100%" src="https://i.ibb.co/8zTghjj/logo3.png" alt="Profile Picture Here" />
                                        </div>
                                        <div class="col-10 pl-6">
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <label class="h1 font-weight-bold" id="c1ChannelName">Upview</label>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <span class="text-red"><i class="anticon anticon-youtube"></i> Followers</span>
                                                    <br>
                                                    <label id="c1ChannelViews" class="font-weight-bold">1</label>
                                                </div>
                                                <div class="col">
                                                    <span class="text-red"><i class="anticon anticon-youtube"></i> Following</span>
                                                    <br>
                                                    <label id="c1ChannelSubscriber" class="font-weight-bold"></label>
                                                </div>
                                                <div class="col">
                                                    <span class="text-red"><i class="anticon anticon-youtube"></i> Reach</span>
                                                    <br>
                                                    <label id="c1ChannelVideos" class="font-weight-bold">2</label>
                                                </div>
                                                <div class="col">
                                                    <span class="text-red"><i class="anticon anticon-youtube"></i> Profile Views</span>
                                                    <br>
                                                    <label id="c1ChannelJoiningDate" class="font-weight-bold"></label>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col">
                                                        <span class="text-red"><i class="anticon anticon-unordered-list"></i> Impressions</span>
                                                        <br>
                                                        <label id="c1ChannelCategory" class="font-weight-bold">3</label>
                                                    </div>
                                                    <div class="col">
                                                        <span class="text-red"><i class="anticon anticon-flag"></i> Active Since</span>
                                                        <br>
                                                        <label id="c1ChannelCountry" class="font-weight-bold">4</label>
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
    </div>
</x-app-layout>

