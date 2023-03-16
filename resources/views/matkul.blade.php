<table>
    <tr>
        <td>id</td>
        <td>matkul</td>
    </tr>
    @foreach ($matkul as $data)
    <tr>
        <td>{{$data->nama}}</td>
        <td>{{$data->nama_matkul}}</td>
        <td>{{$data->sks}}</td>
    </tr>
        
    @endforeach
</table>