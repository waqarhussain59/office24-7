<style type="text/css">
    table td, table th {
        border: 1px solid black;
    }

    .container {
        padding: 20px;
    }
</style>


<div class="container">
    <div>
        <h1>Director Housing Societies CDA</h1>
    </div>
    <br/>
    <div class="row">
                <h4 class="text-center">{{$reports->title}}</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="center">
                <thead>
                <th>Para No</th>
                <th>Remarks</th>
                <th>Date</th>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->para_no }}</td>
                        <td>{{ $comment->comments }}</td>
                        <td>{{ $comment->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
