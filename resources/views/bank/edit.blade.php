@extends('layouts.adminlte.master')

@section('title')
    @lang('bank.edit.title')
@endsection

@section('page_title')
    <span class="fa fa-bank fa-fw"></span>&nbsp;@lang('bank.edit.page_title')
@endsection

@section('page_title_desc')
    @lang('bank.edit.page_title_desc')
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('master_bank_edit', $bank->hId()) !!}
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>@lang('labels.GENERAL_ERROR_TITLE')</strong> @lang('labels.GENERAL_ERROR_DESC')<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('bank.edit.header.title')</h3>
        </div>
        {!! Form::model($bank, ['method' => 'PATCH', 'route' => ['db.master.bank.edit', $bank->hId()], 'class' => 'form-horizontal', 'data-parsley-validate' => 'parsley']) !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">@lang('bank.field.name')</label>
                    <div class="col-sm-10">
                        <input id="inputName" name="name" type="text" class="form-control" value="{{ $bank->name }}" placeholder="Name" data-parsley-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputShortName" class="col-sm-2 control-label">@lang('bank.field.short_name')</label>
                    <div class="col-sm-10">
                        <input id="inputShortName" name="short_name" type="text" class="form-control" value="{{ $bank->short_name }}" placeholder="Short Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBranch" class="col-sm-2 control-label">@lang('bank.field.branch')</label>
                    <div class="col-sm-10">
                        <input id="inputBranch" name="branch" type="text" class="form-control" value="{{ $bank->branch }}" placeholder="Branch">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBranchCode" class="col-sm-2 control-label">@lang('bank.field.branch_code')</label>
                    <div class="col-sm-10">
                        <input id="inputBranch" name="branch_code" type="text" class="form-control" value="{{ $bank->branch_code }}" placeholder="Branch Code">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="inputStatus" class="col-sm-2 control-label">@lang('bank.field.status')</label>
                    <div class="col-sm-10">
                        {{ Form::select('status', $statusDDL, null, array('class' => 'form-control', 'placeholder' => Lang::get('labels.PLEASE_SELECT'), 'data-parsley-required' => 'true')) }}
                        <span class="help-block">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputRemarks" class="col-sm-2 control-label">@lang('bank.field.remarks')</label>
                    <div class="col-sm-10">
                        <input id="inputRemarks" name="remarks" type="text" class="form-control" value="{{ $bank->remarks }}" placeholder="Remarks">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputButton" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <a href="{{ route('db.master.bank') }}" class="btn btn-default">@lang('buttons.cancel_button')</a>
                        <button class="btn btn-default" type="submit">@lang('buttons.submit_button')</button>
                    </div>
                </div>
            </div>
            <div class="box-footer"></div>
        {!! Form::close() !!}
    </div>
@endsection