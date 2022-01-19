@extends('layouts.app')

    @section('content')
    <div class="container">
       <div class="m-4">
        @foreach ($notifications as $key => $notification)
        @foreach ($notification->data as $data)
        <div class="m-2">
            <div class="card d-flex p-0 m-0 mb-4 shadow">
                <div class="card-body">
                    <div>
                        <?php
                            $expiry_date = new Carbon\Carbon($data['expiry_date']);
                            $now = Carbon\Carbon::now();
                            $expiry_date = ($expiry_date->diff($now)->days < 1) ? 'today' : $expiry_date->diffForHumans($now);

                            $created_at_date = new Carbon\Carbon($data['product']['created_at']);

                            $created_at_date = ($created_at_date->diff($now)->days < 1) ? 'today' : $created_at_date->diffForHumans($now);
                            $notification_date = new Carbon\Carbon($dates[$loop->parent->index]);

                            $notification_date = $notification_date->diffForHumans($now);
                        ?>
                        <div class="d-flex flex-column align-content-between">
                            <p>{{$notification_date}}</p>
                            <div class="d-flex flex-row justify-content-between">
                                <h5 class="mt-2">
                                    Product <strong class="text-orange">{{$data['product']['name']}}</strong> you bought {{ $created_at_date}} will expire <strong class="text-orange">{{ $expiry_date }}</strong>
                                </h5>
                                <a href="{{ route('storeroom.index') }}" class="btn btn-success">Storeroom</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endforeach
       </div>
    </div>

@endsection

@section('scripts')

@endsection
