@extends('neon')

@section('c')
	
	<h2> <i class="{{ $l->icon }}"></i> {{ $l->name }}</h2>

	@include('manage/requesttable')

@stop