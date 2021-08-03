
<html>
<head>
  <title>Connect</title>
</head>
<body>
  <center>
    <h2>LOGIN</h2> 
    <form method="post" action="<?php echo site_url('Login/Loginmik'); ?>">
          <table>
             <tr><td>IP Mikrotik</td><td><input type="text"  placeholder="Masukkan IP" name="ip"></td></tr>
             <tr><td>Username</td><td><input type="text" placeholder="Masukkan Username" name="un"></td></tr>
             <tr><td>Password</td><td><input type="text" placeholder="Masukkan Password" name="pw"></td></tr>
             <tr align="center"><td colspan="2"><button type="submit" value="Connect">Connect</button></td></tr>
       

          </table>
               
        </form>
    </center>    
    
</body>
</html>


<!-- 
<!DOCTYPE html>
<html>
<head>
  <title>Menu blockir</title>
</head>
<body>
 

  <center>
    <h2>-------</h2> 
    <form method="" action="">
     <tr align="right"></tr> 
          <table border="1" width="70%">
             <tr align="center" ><td colspan="4"><b>Blockir Package Berbahaya</td>
                                <td colspan="4"><b>Blockir Url Berbahaya<b</td></tr>
                             <tr><td align="center" colspan="4"><input type="text"  placeholder="Add Blockir Package" width="100" name="addpa"><button type="" value="tambahpa">Tambah</button></td> 
                              <td align="center" colspan="4">
                                <input type="text"  placeholder="Add Blockir Url" width="100" name="addpa"><button type="" value="tambahpa">Tambah</button>
                              </td>
                            </tr>
            <tr>
            <th> <center> No</th> 
             <th> <center>Nama Package</th>
             <th> <center>a</th>
             <th > <center>status</th>
             <th> <center> No</th> 
             <th> <center>Nama Url</th>
             <th> <center>a</th>
             <th > <center>status</th>
            </tr>
            
        

          </table>
               
        </form>
    </center>    
    
</body>
</html>
 --><!-- 

<!DOCTYPE html>
<html>
<head>
  <title>Firewall Remote</title>
</head>
<body>
 

  <center>
    <h2>Firewall Remote</h2> 
    <form method="" action="">
     <tr align="right"></tr> 
          <table border="1" width="70%">
             <tr align="center" ><td colspan="5"><b>Monitoring Client</td></tr>
            <tr>
            <th> <center> No</th> 
             <th> <center>Address</th>
             <th > <center>Access</th>
             <th> <center>traffic</th>
             <th > <center>Aksi</th>
            </tr>
            
        

          </table>
               
        </form>
    </center>    
    
</body>
</html>