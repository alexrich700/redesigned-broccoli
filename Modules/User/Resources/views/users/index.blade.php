@extends('core::layouts.app')
@section('title', __('Users'))
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Users')</h1>
    <a href="{{ route('settings.users.create') }}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> @lang('Create')</a>
</div>

<div class="row">
    <div class="col-md-3">
        @include('core::partials.settings-sidebar')
    </div>
    <div class="col-md-9">
        @if($data->count() > 0)
        <div class="card mb-3">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('E-mail')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>
                                <a href="{{ route('settings.users.edit', $item) }}">{{ $item->name }}</a>
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                     <div class="d-flex">
                                        <div class="p-1 ">
                                             <a href="{{ route('settings.users.edit', $item) }}" class="btn btn-sm btn-primary">@lang('Edit')</a>
                                        </div>
                                        
                                        <div class="p-1 ">
                                              <form method="post" action="{{ route('settings.users.destroy', $item) }}" onsubmit="return confirm('@lang('Confirm delete?')');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fe fe-trash"></i> @lang('Delete')
                                                </button>
                                            </form>
                                        </div>

                                        @if(\Auth::id() != $item->id)
                                        <div class="p-1 ">
                                             <a href="{{ route('settings.user.impersonate', $item->id) }}" class="btn btn-sm btn-primary">@lang('Impersonate')</a>
                                        </div>
                                        @endif
                                    </div>
                                   
                                    
                                </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        {{ $data->appends( Request::all() )->links() }}
        @if($data->count() == 0)
        <div class="alert alert-primary text-center">
            <i class="fe fe-alert-triangle mr-2"></i> @lang('No users found')
        </div>
        @endif
    </div>
    
</div>
@stop