<form action="" method="POST">
  <input name="fio" />
  <select name="year">
    <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select>
			<br />
			<label>
				Email
				<br />
				<input name="field-email-1" value="Введите почту">
			</label>
			Выберите пол:<br />
      <label><input type="radio" checked="checked"
        name="radio-group-1" value="Значение1" />
        Мужской</label>
      <label><input type="radio"
        name="radio-group-1" value="Значение2" />
        Женский</label><br />
				Кол-во конечностей:<br />
				<label><input type="radio" checked="checked"
					name="radio-group-1" value="Значение1" />
					 1</label>
				<label><input type="radio"
					name="radio-group-1" value="Значение2" />
					 2</label>
					 <label><input type="radio"
						name="radio-group-1" value="Значение3" />
						 3</label>
						 <label><input type="radio"
							name="radio-group-1" value="Значение4" />
							 4</label><br />
	<label>Сверхспособности:<br />
		<select name="field-name-4[]" multiple="multiple">
			<option value="Значение1">Левитация</option>
			<option value="Значение2" selected="selected">Прохождение сквозь стены </option>
			<option value="Значение3" selected="selected">Бессмертие</option>
		</select>
	</label>
	<p>
	<label>
		Напишите биографию:<br />
		<textarea name="field-name-2">начальное значение</textarea>
	</label><br /><p\>
		<p>
			Чекбокс:<br />
      <label><input type="checkbox"
        name="check-1" />
        C контрактом ознакомлен</label><br />
		</p>
		<p>
			<input type="submit" value="Отправить" />
		</p>
		</form>
