<table class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($headers as $header)
                    <td>{{ $row->{$header} }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
