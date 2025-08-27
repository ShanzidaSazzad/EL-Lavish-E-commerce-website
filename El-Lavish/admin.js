function updateUser(id) {
    if (confirm("Are you sure you want to update this user?")) {
      window.location.href = `update.php?id=${id}`;
    }
  }
  
  function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
      window.location.href = `delete.php?id=${id}`;
    }
  }