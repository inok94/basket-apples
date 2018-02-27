@extends('app')

@section('content')

    <div class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><b>SITE</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-6">
            <h3>Users</h3>
            <ul class="list-group">
                @foreach( $users as $user )
                    <li class="list-group-item">
                        {{ $user->name }} has {{ $user->getApplesCount() }}
                        apples {{ $user->getApplesCount() === 1 ? '' : 's' }}{{ $user->getApplesCount() === 0 ? '' : ':' }}
                        <div class="pull-left">
                            @if (count($user->storages) > 0)
                                <ul>
                                    @foreach( $user->storages as $i => $order )
                                        <li>Apple #{{ $order->apple_id }} grabbed
                                            at {{ date('M. j, Y H:i:s T', strtotime($order->created_at)) }}{{ $i < count($user->storages) - 1 ? ', ' : '.' }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <a class="btn btn-xs btn-default pull-right" href="{{ url('/take-apple/'.$user->id) }}">Grab
                            apple</a>
                        <div class="clearfix"></div>
                    </li>
                @endforeach
            </ul>
            <div class="centered">
                <a class="btn btn-lg btn-success text-center" href="{{ url('/free-apples') }}">Reset Apples</a>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Basket</h3>
            <ul class="list-group">
                @foreach( $basketApples as $apple )
                    <li class="list-group-item">
                        Apple <span class="pull-right text-muted">#{{ $apple->id }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection


