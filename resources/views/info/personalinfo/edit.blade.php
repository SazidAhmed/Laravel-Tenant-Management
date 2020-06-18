@extends('layouts.apanel')
@section('content')
<div class="container">
    <table class="table table-light">
            <h2>Update info</h2>
            <hr>
            {!! Form::open(['action'=> ['PersonalinfoController@update',$personalinfo->id ],'method'=>'POST']) !!}
        <div class="form-row">
            <div class='form-group col-md-4'>
                {{form::label('floor','Floor')}} <br>
                {{form::select('floor', array
                    ('Ground West' => 'Ground West', 'Ground East' => 'Ground East',
                    '1st East' => '1st East', '1st West' => '1st West',
                    '2nd East' => '2nd East', '2nd West' => '2nd West',
                    '3rd East' => '3rd East', '3rd West' => '3rd West',
                    '4th East' => '4th East', '4th West' => '4th West',
                    '5th East' => '5th East', '5th West' => '5th West',
                    '6th East' => '6th East', '6th West' => '6th West',
                    '7th North' => '7th North', '7th South' => '7th South'
                    ), $personalinfo->floor
                )}}
            </div>
        </div>

        <div class="form-row">
            <div class='form-group col-md-4'>
                {{form::label('person_name','Full Name')}}
                {{form::text('person_name',$personalinfo->person_name,['class'=>'form-control','placeholder'=>'Name'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('father_name','Father Name')}}
                {{form::text('father_name',$personalinfo->father_name,['class'=>'form-control','placeholder'=>'Father Name'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('date_of_birth','Date Of Birth')}}
                {{form::date('date_of_birth',$personalinfo->date_of_birth,['class'=>'form-control','placeholder'=>'Date Of Birth'])}}
            </div>
        </div>

        <div class="form-row">
            <div class='form-group col-md-3'>
                {{form::label('religion','Religion')}} <br>
                {{form::select('religion', array
                ('Islam' => 'Islam', 'Hinduism' => 'Hinduism',
                'Buddhism' => 'Buddhism', 'Christianity' => 'Christianity'),$personalinfo->religion
                )}}
            </div>

            <div class='form-group col-md-3'>
                {{form::label('edu_qualification','Education')}} <br>
                
                {{form::select('edu_qualification', array
                    ('PSC' => 'PSC', 'JSC' => 'JSC',
                    'SSC' => 'SSC', 'HSC' => 'HSC',
                    'Honors/Degree' => 'Honors/Degree', 'Masters' => 'Masters',
                    'BSC' => 'BSC', 'MSC' => 'MSC',
                    'BBA' => 'BBA', 'MBA' => 'MBA',
                    'LLB' => 'LLB', 'LLM' => 'LLM',
                    'MBBS' => 'MBBS', 'Phd' => 'Phd',
                    'Diploma Engineer' => 'Diploma Engineer'
                    ), $personalinfo->edu_qualification
                )}}
            </div>

            <div class='form-group col-md-3'>
                {{form::label('marital_status','Marital Status')}} <br>
                {{form::select('marital_status', array
                ('Married' => 'Married', 'Unmarried' => 'Unmarried'),$personalinfo->marital_status
                )}}
            </div>

            <div class='form-group col-md-3'>
                {{form::label('occupation','Occupation')}} <br>
                
                {{form::select('occupation', array
                    ('Job' => 'Job', 'Business' => 'Business',
                    'Home Maker' => 'Home Maker', 'Student' => 'Student',
                    'Freelancer' => 'Freelancer', 'Artist' => 'Artist',
                    'Unemployed' => 'Unemployed'
                    ), $personalinfo->occupation
                )}}
            </div>
        </div>

        <div class="form-row">
            <div class='form-group col-md-6'>
                {{form::label('office_address','Office Address')}}
                {{form::text('office_address',$personalinfo->office_address,['class'=>'form-control','placeholder'=>'Office Address'])}}
            </div>

            <div class='form-group col-md-6'>
                {{form::label('permanent_address','Permanent Address')}}
                {{form::text('permanent_address',$personalinfo->permanent_address,['class'=>'form-control','placeholder'=>'Permanent Address'])}}
            </div>
        </div>

        <div class="form-row">
            <div class='form-group col-md-3'>
                {{form::label('contact','Contact')}}
                {{form::text('contact',$personalinfo->contact,['class'=>'form-control','placeholder'=>'Contact'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('email','Email')}}
                {{form::text('email',$personalinfo->email,['class'=>'form-control','placeholder'=>'Email'])}}
            </div>

            <div class='form-group col-md-3'>
                {{form::label('nid','NID')}}
                {{form::text('nid',$personalinfo->nid,['class'=>'form-control','placeholder'=>'NID'])}}
            </div>

            <div class='form-group col-md-2'>
                {{form::label('passport_no','Passport')}}
                {{form::text('passport_no',$personalinfo->passport_no,['class'=>'form-control','placeholder'=>'Passport'])}}
            </div> 
        </div>   
            <hr>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
    </table>
</div>
@endsection
