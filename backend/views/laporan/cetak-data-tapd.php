<table border="1">
    <thead>
        <tr>
            <th>Nama Tempat</th>
            <th>Nama Kegiatan</th>
            <th>Lokasi</th>
            <th>Permintaan Dana</th>
            <th>Dana Yang di setujui</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dataCalonPenerima as $value){ ?>
        <tr>
            <td><?=$value['nm_tempat'] ?></td>
     <td><?=$value['nm_keg'] ?></td>
            <td><?=$value['lokasi'] ?></td>
            <td><?=$value['pagu_permintaan'] ?></td>
            <td><?=$value['pagu_usulan'] ?></td>
        
        </tr>
        <?php } ?>
    </tbody>
</table>
