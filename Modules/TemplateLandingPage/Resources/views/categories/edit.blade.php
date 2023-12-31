@extends('core::layouts.app')

@section('title', __('Update catetory'))

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Update catetory')</h1>
</div>
<div class="row">
    <div class="col-md-3">                 
        @include('core::partials.settings-sidebar')
    </div>
    <div class="col-md-9">

        <form role="form" method="post" action="{{ route('settings.categories.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="form-label">@lang('Name')</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="@lang('Name')">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Group Categories')</label>
                                 <select name="group_category_id" class="form-control">
                                    @foreach ($groupCategories as $item)
                                        <option value="{{$item->id}}"
                                         @if ($item->id == $category->group_category_id)
                                            selected="selected"
                                        @endif>
                                        {{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="{{ route('settings.categories.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
                        <button class="btn btn-primary ml-auto">@lang('Save')</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    
</div>
@stop
