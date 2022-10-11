<div class="SearchFilterPanel active">
    <div class="form">
        <div class="row" style="padding-right: 50px">
            <?php  $total_filters = !empty($filtersFields)?count($filtersFields):0;

            if ($total_filters == 2) {
                $columns = 6;
            } else if ($total_filters == 3) {
                $columns = 4;
            } else if ($total_filters == 4) {
                $columns = 3;
            } else if ($total_filters == 5) {
                $columns = 4;
            } else if ($total_filters == 6) {
                $columns = 4;
            } else if ($total_filters == 7) {
                $columns = 3;
            } else if ($total_filters == 8) {
                $columns = 3;
            } else {
                $columns = 2;
            }
            ?>
            @if(!empty($filtersFields))
                @foreach($filtersFields as $key => $field)
                    <div class="col-lg-{!! $columns !!} col-md-{!! $columns !!} block input-col form-group mt-3 mb-2">
{{--                        <label for="">{!! $field['title'] !!}</label>--}}
                        @switch($field['type'])
                            @case('text')
                            <input autocomplete="off" type="text" name="{!! $key !!}"
                                   placeholder="{!! $field['title'] !!}"
                                   class="form-control {!! $field['class'] !!} formFieldName">
                            @break
                            @case('number')
                            <input autocomplete="off" type="number" name="{!! $key !!}"
                                   placeholder="{!! $field['title'] !!}"
                                   class="form-control {!! $field['class'] !!} formFieldName">
                            @break
                            @case('date')
                            <input autocomplete="off" type="date" name="{!! $key !!}"
                                   placeholder="{!! $field['title'] !!}"
                                   class="form-control {!! $field['class'] !!} formFieldName">
                            @break
                            @case('select')
                            @if($key == 'is_active')
                                {{--{!! dd($field) !!}--}}
                            @endif
                            <select autocomplete="off" name="{!! $key !!}"
                                    class="form-select {!! $field['class'] !!} formFieldName"
                                    placeholder="{!! $field['placeholder'] !!}">
                                @foreach($field['options'] as $option_key =>$option)
                                    @php $selected  =  (!empty($field['selected']) && $option_key == $field['selected'])?'selected="selected"':''@endphp
                                    <option {!! $selected !!} value="{!! $option_key !!}">{!! $option !!}</option>
                                @endforeach
                            </select>
                            @break
                        @endswitch
                    </div>
                @endforeach
            @endif
        <div class="{{--form-group mt-2 mb-2--}} col-lg-2 col-md-2 block input-col form-group mt-3 mb-2 filter-button" table="{!! $tableId !!}">
            <button type="button" class="btn btn-primary filterBtn ico-btn"><i class="fa fa-search"></i> Search</button>
            <button type="button" class="btn btn-danger filterBtnReset ico-btn"><i class="mdi mdi-redo"></i>Reset
            </button>
        </div>
        </div>
        <hr>
    </div>
</div>

