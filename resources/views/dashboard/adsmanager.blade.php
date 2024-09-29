@extends('_partials.content')
@section('content')
<form class="auth-login-form mt-2" action="adsmanager/update" method="post">
        @csrf
    {{-- <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-1">
                        <label for="provider">Provider</label>
                        <select name="provider" id="provider" class="form-select">
                            <option value="ADMOB" >
                                ADMOB
                            </option>
                            <option value="FACEBOOKBIDDING">
                                FACEBOOK BIDDING ADMOB
                            </option>

                            <option value="DISABLE">
                                DISABLE
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="banner_enable">Banner Enable</label>
                        <select name="banner_enable" id="banner_enable" class="form-select">
                            <option value="1" >
                                enable
                            </option>
                            <option value="0" >
                                disable
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="interstitial_enable">Interstitial Enable</label>
                        <select name="interstitial_enable" id="interstitial_enable" class="form-select">
                            <option value="1" >
                                enable
                            </option>
                            <option value="0" >
                                disable
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="reward_enable">Reward Enable</label>
                        <select name="reward_enable" id="reward_enable" class="form-select">
                            <option value="1">
                                enable
                            </option>
                            <option value="0">
                                disable
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="open_enable">Open Enable</label>
                        <select name="open_enable" id="open_enable" class="form-select">
                            <option value="1">
                                enable
                            </option>
                            <option value="0">
                                disable
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-1">
                        <label for="native_enable">Native Enable - Only For Admob</label>
                        <select name="native_enable" id="native_enable" class="form-select">
                            <option value="1">
                                enable
                            </option>
                            <option value="0">
                                disable
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">ADMOB</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="admob_banner">Admob Banner</label>
                        <input type="text" class="form-control" id="admob_banner" name="admob_banner"
                               value="{{$data->admob_banner}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="admob_interstitial">Admob Interstitial</label>
                        <input type="text" class="form-control" id="admob_interstitial" name="admob_interstitial"
                               value="{{$data->admob_interstitial}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="admob_reward">Admob Reward</label>
                        <input type="text" class="form-control" id="admob_reward" name="admob_reward"
                               value="{{$data->admob_reward}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="admob_open">Admob Open</label>
                        <input type="text" class="form-control" id="admob_open" name="admob_open"
                               value="{{$data->admob_open}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-1">
                        <label for="admob_native">Admob Native</label>
                        <input type="text" class="form-control" id="admob_native" name="admob_native"
                               value="{{$data->admob_native}}">
                    </div>

                    <div class="col-md-12">
                        <button type="submit"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Disable On Demo"
                                class="btn btn-gradient-primary float-end">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>

@endsection
