<form action="" method="POST">
	Name:
  <input name="fio" />
  <select name="year">
    <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select>
			<br />	
			<p>
	<label>
		Напишите биографию:<br />
		<textarea name="biography">начальное значение</textarea>
	</label><br /><p\>
			<label>
				Email
				<br />
				<input name="email" value="Введите почту">
			</label>
			</p>

				Кол-во конечностей:<br />
				<label><input type="radio" checked="checked"
					name="limbs" value="1" />
					 1</label>
				<label><input type="radio"
					name="limbs" value="2" />
					 2</label>
					 <label><input type="radio"
						name="limbs" value="3" />
						 3</label>
						 <label><input type="radio"
							name="limbs" value="4" />
							 4</label><br />
							 <p>Выберите пол: <br>
<label><input type="radio" checked="checked"
					name="gender" value="M" />
					 M</label>
				<label><input type="radio"
					name="gender" value="F" />
					 F</label></p>
	<label>Сверхспособности:<br />
		<select name="ability[]" multiple="multiple">
			<option value="1">Левитация</option>
			<option value="2" selected="selected">Прохождение сквозь стены </option>
			<option value="3" selected="selected">Бессмертие</option>
		</select>
	</label>

		<p>
			Чекбокс:<br />
      <label><input type="checkbox"
        name="checkbox" />
        C контрактом ознакомлен</label><br />
		</p>
		<p>
			<input type="submit" value="Отправить" />
		</p>
		</form>
