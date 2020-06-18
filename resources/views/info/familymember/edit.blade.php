@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Update Member</h1> 
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['FamilymemberController@update',$familymember->id ],'method'=>'POST']) !!}
            
            <div class='form-group'>
                {{form::label('family_member_name','Full Name')}}
                {{form::text('family_member_name', $familymember->family_member_name,['class'=>'form-control','placeholder'=>'Full Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('family_member_nid','NID')}}
                {{form::text('family_member_nid',$familymember->family_member_nid,['class'=>'form-control','placeholder'=>'NID'])}}
            </div>

            <div class='form-group'>
                {{form::label('family_member_relation','Relation')}}
                {{form::text('family_member_relation',$familymember->family_member_relation,['class'=>'form-control','placeholder'=>'Relation'])}}
            </div>

            <div class='form-group'>
                {{form::label('family_member_contact','Contact')}}
                {{form::text('family_member_contact',$familymember->family_member_contact,['class'=>'form-control','placeholder'=>'Contact'])}}
            </div>

            <div class='form-group'>
                {{form::label('family_member_age','Age')}}
                {{form::text('family_member_age',$familymember->family_member_age ,['class'=>'form-control','placeholder'=>'Age'])}}
            </div>

            <div class='form-group'>
            {{form::label('family_member_occupation','Occupation')}} <br>
            {{form::select('family_member_occupation', array
                ('Job' => 'Job', 'Business' => 'Business',
                'Home Maker' => 'Home Maker', 'Student' => 'Student',
                'Freelancer' => 'Freelancer', 'Artist' => 'Artist',
                'Unemployed' => 'Unemployed'
                ), $familymember->family_member_occupation
            )}}
            </div>
        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection

