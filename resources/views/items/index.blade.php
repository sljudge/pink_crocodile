@extends('layouts/app')

@section('content')
    @can('admin')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-2">
                    <h4 class="card-header">Items List</h4>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                        {{-- 'title', 'description', 'estimated_price', 'currency', 'doner_id', 'photo_path', --}}
                                    <th scope="col">
                                        <a href="{{action('ItemController@index', 'title')}}">Title</a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{action('ItemController@index', 'doners.name')}}">Doner</a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{action('ItemController@index', 'estimated_price')}}">Estimated Price</a>
                                    </th>
                                    <th scope="col">
                                        Assign to
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($items) > 0)
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item->title}}</td>
                                            <td>{{ (($item->doner !== null) ? $item->doner->name : '') }}</td>
                                            <td>{{$item->estimated_price . " " . (($item->estimated_price !== null) ? $item->currency : '')}}</td>
                                            <td>x</td>
                                            <td>
                                                <div class="float-right">
                                                    <a href="{{action('ItemController@show', $item->id)}}"><button class="btn btn-primary">Details</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">There are no doners at the moment</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $items->links() }}
                        <a href="{{route('admin')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                        <a href="{{action('ItemController@create')}}"><button class="btn btn-primary">Add New Item</button></a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>You are not authrized to see doners. Please contact admin.</p>
        <a href="{{route('admin')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
    @endcan
    
@endsection