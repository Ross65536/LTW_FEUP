<h2><?=$main_info['name']?></h2>
<h4>Created by <?=$creator?> on <?=$main_info['date_created']?></h4>
<ul id="items_list">
  <h3>List Items</h3>
  <?if (empty($listItems)) {?>
    <li>
      No items were added here yet.
    </li>
  <?} else
  foreach ($listItems as $item) {?>
    <li>
      <input type="checkbox" <?= ($item['done'] == 1 ? 'checked' : '');?>>
      <?=$item['description']?>
      <input type="hidden" value="<?=$item['description']?>" name="items[]"/>
    </li>
  <?}?>
</ul>
<div id="new_item" style="display: none">
  <label>
    New Item: <input type="text" id="item"/>
    <button type="button" onclick="addItem()">Add</button>
  </label>
</div>
<ul id="users_list">
  <h3>Users Added</h3>
  <?if (empty($listUsers)) {?>
    <li>
      No users were added here yet.
    </li>
  <?}foreach ($listUsers as $user) {?>
    <li>
      <?=$user['username']?>
      <input type="hidden" value="<?=$user['username']?>" name="users[]"/>
    </li>
  <?}?>
</ul>
<?if ($creator === "you"){ ?>
        <form action='edit_list.php' method="get">
          <input type="hidden" name="id" value="<?=$_GET['id']?>"/>
          <button>Edit</button>
        </form>
<? } else {?>
  <button onclick="edit_list()">Edit</button>
  <button id="save_button" style="display: none" onclick="action_save_list.php">Save</button>
<?} ?>