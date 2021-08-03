<!DOCTYPE html>
<html>
<head>
  <title>Menu blockir</title>
</head>
<body>
 

  <center>
    <h2>Block Url</h2> 
    <form method="POST" action="<?php echo site_url('Firewall-Tambah'); ?>">
    
     <tr align="right"></tr> 
          <table border="1" width="70%">
             <tr align="center" >
                <td colspan="7"><b>List Blockir<b></td>
                </tr>
                <tr>
             
                  <td align="center"colspan="7" >
                    <input type="text"  placeholder="Add Blockir " width="100" name="adduri">
                    <button type="submit" value="tambahpa">Tambah</button>
                  </td>
                </tr>
            <tr>
             
               <th> <center> No</th> 
               <th> <center>Nama Url</th>
               <th> <center>Chain</th>
               <th> <center>Action</th>
               <th> <center>status</th>
               <th> <center></th>
               <!-- <th ></th> -->
               <!-- <th ><center></center></th> -->
            </tr>
            <tbody>
              <?php
        $i=0;
              foreach($dataBlokir as $data ):
                $i++;
              ?>
              <tr>
                <td><?= $i; ?></td>  
                <td><?= $data['regexp']; ?></td>  
                <td><?= $data['chain']; ?></td>  
                <td><?= $data['action']; ?></td>  
                <td><?= $data['action']=='drop'?'Enable':'disable'; ?></td>  
                <td><center>
                <a href="<?= site_url('Mikrotik_Dasboard/Firewall/removeBlok?id=').$data['id'].'&idfilter='.$data['idfilter']?>">
                <button type="button" value="disable">Remove</button>
              </a>
                </td>
              </tr>
            </tbody>
              <?php endforeach; ?>

          </table>
               
        </form>
    </center>    
    
</body>
</html>