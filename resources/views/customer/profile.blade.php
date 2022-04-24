@extends('welcome')
@section('content')
<style>
    .form-img {
        padding-top: 25px;
        padding-bottom: 15px;
    }
</style>
<div class="page-content bg-white">
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(public/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Profile</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li>Profile</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" id="img-preview" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <div class="form-img">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="file" title=" " style="color:transparent; width:100px;" accept="image/*" id="file-input">
                            <input type="submit" value="submit">
                        </form>
                    </div>
                    <span class="font-weight-bold">{{$user->user_name}}</span>
                    <span class="text-black-50">{{$user->user_email}}</span><span> </span>
                </div>
            </div>
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Fullname</label><input type="text" class="form-control" placeholder="first name" value="{{$user->user_name}}"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{$user->user_phone}}"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email" value="{{$user->user_email}}"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address " value="{{$user->user_adress}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Học vấn</label>
                            <select class="form-control" value="">
                                <option>Năm 1</option>
                                <option>Năm 2</option>
                                <option>Năm 3</option>
                                <option>Năm 4</option>
                                <option>Tốt nghiệp</option>
                                <option>Không</option>
                            </select>
                        </div>
                        <div class="col-md-6"><label class="labels">University</label><input type="text" class="form-control" value="" placeholder="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12">
                        <label class="labels">Experience</label>
                        <textarea id="textarea1" class="form-control" cols="" rows="20" placeholder="Nhập"></textarea>
                    </div><br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const input = document.getElementById("file-input");
    const image = document.getElementById("img-preview");

    input.addEventListener("change", (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            image.src = src;
        }
    });
</script>
@endsection