@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label>New Password:</label>
                            <input type="text" name="password" placeholder="Input new password..." class="form-control mt-2 mb-3">
                        </div>
                        <div>
                            <label>Confirm New Password:</label>
                            <input type="text" name="confirm_password" placeholder="Input confirm new password..."  class="form-control mt-2 mb-3">
                        </div>
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection