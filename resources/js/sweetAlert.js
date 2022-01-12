Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Delete',
//   denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Category deleted!', '', 'success')
    
  } else if (result.isDenied) {
    Swal.fire('Category is not deleted', '', 'info')
  }
})