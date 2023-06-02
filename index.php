<DOCTYPE !html>
<html>
<head><title>Test Backend Icube</title>
<style>
	body{ font-family:Arial; }
	fieldset{ width:300px; padding:15px 10px; border:1px solid #aaa; }
	input,button,label{ margin:10px 5px; display:block; }
	input[type=radio]{ margin:2px 5px; display:inline-block; }
	label{ font-weight:bold; margin: 10px 5px 5px 5px; }
	td,th{ padding:2px 10px; }
	td.delete button{ background-color:#a55; color:#fff; font-weight:bold; border:none; margin:0; cursor:pointer; }
</style>
</head>
<body>
	<form action="index.php" method="POST">
		<fieldset>
			<legend>Input Instansi</legend>
			<label for="nama">Instansi</label>
			<input type="text" name="nama" value="" required/>
			<label for="deskripsi">Deskripsi</label>
			<input type="text" name="deskripsi" value="" required/>
			<button type="submit" name="submit" value="submit" >Save</button>
		</fieldset>
	</form>

	<table>
		<tr>
			<th>No</th>
			<th>Aksi</th>
			<th>Instansi</th>
			<th>Deskkripsi</th>
		</tr>

		<?php
			include './Config/Model.php';

			// get data
			$get_product_query = "SELECT * FROM instansi";

			$data = new Model;
			$instansi_list = $data->getData($get_product_query);
			// end get data

			// insert or update data
			if(isset($_POST['submit'])) {
				$nama = $_POST['nama'];
				$deskripsi = $_POST['deskripsi'];

				// check price
				$cek_query = "SELECT * FROM instansi WHERE nama = '{$nama}'";

				$cek = new Model;
				$data = $cek->getConnection()->query($cek_query);
				$result = mysqli_fetch_array($data, MYSQLI_ASSOC);
				if (!$result) {
					// insert price
					$new_query = "INSERT INTO instansi (nama,deskripsi) VALUES ('{$nama}','{$deskripsi}')";
				
					$new = new Model;
					$new->getConnection()->query($new_query);

					header('Location:index.php');
				} else {
					// update price
					$instansi_id = $result['id'];

					$update_query = "UPDATE instansi SET nama='{$nama}', deskripsi='{$deskripsi}'
					WHERE id={$instansi_id}";
				
					$update = new Model;
					$update->getConnection()->query($update_query);

					header('Location:index.php');
				}
			}
			// end insert or update data

			// delete data
			if(isset($_POST['delete'])) {
				$id = (int)$_POST['instansi_id'];

				$delete_query = "DELETE FROM instansi WHERE id={$id}";
			
				$delete = new Model;
				$delete->getConnection()->query($delete_query);

				header('Location:index.php');
			}
			// end delete data
		?>

		<?php 
			$i = 1;
			foreach ($instansi_list as $instansi) { 
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td class="delete">
					<form action="index.php" method="POST">
						<input type="hidden" name="instansi_id" value="<?php echo $instansi['id'] ?>" />
						<button type="submit" name="delete" title="delete">x</button>
					</form>
				</td>
				<td><?php echo $instansi['nama'] ?></td>
				<td><?php echo $instansi['deskripsi'] ?></td>
			</tr>
		<?php $i++; } ?>
	</table>
</body>
</html>