$(document).ready(function () {
  const $sidebar = $('#sidebar');
  const $openSidebar = $('#openSidebar');
  const $closeSidebar = $('#closeSidebar');
  const $dropdown = $('#dropdown');
  const $dropdownTrigger = $('#dropdownTrigger');

  function clickOutside($element, event) {
    return !$element.is(event.target) && !$element.has(event.target).length;
  }

  function setActiveSidebarLinks() {
    const currentUrl = window.location.pathname;
    $('#sidebar a').each(function () {
      const route = $(this).data('route');
      if (currentUrl.includes(route)) {
        $(this).addClass('bg-cyan-500 text-white').removeClass('hover:bg-gray-100');
      }
    });
  }

  $closeSidebar.on('click', function () {
    $sidebar.removeClass('!translate-x-0');
  });

  $openSidebar.on('click', function () {
    $sidebar.addClass('!translate-x-0');
  });

  $dropdownTrigger.on('click', function () {
    $dropdown.toggleClass('opacity-0 !top-20');
  });

  $(document).on('click', function (event) {
    if (clickOutside($sidebar, event) && clickOutside($openSidebar, event)) {
      $sidebar.removeClass('!translate-x-0');
    }
    if (clickOutside($dropdown, event) && clickOutside($dropdownTrigger, event)) {
      $dropdown.addClass('opacity-0').removeClass('!top-20');
    }
  });

  setActiveSidebarLinks();

  $('.button-delete').click(function () {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
    }).then(result => {
      if (result.isConfirmed) {
        console.log(id);
        $.ajax({
          url: '/pustakawan-delete/' + id,
          type: 'POST',
          data: { id: id },
          success: function () {
            Swal.fire('Deleted!', 'Your data has been deleted.', 'success').then(() => location.reload());
          },
          error: function () {
            Swal.fire('Error!', 'An error occurred while deleting data.', 'error');
          },
        });
      }
    });
  });
  $('.button-delete-pengunjung').click(function () {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
    }).then(result => {
      if (result.isConfirmed) {
        console.log(id);
        $.ajax({
          url: '/pustakawan-delete/' + id,
          type: 'POST',
          data: { id: id },
          success: function () {
            Swal.fire('Deleted!', 'Your data has been deleted.', 'success').then(() => location.reload());
          },
          error: function () {
            Swal.fire('Error!', 'An error occurred while deleting data.', 'error');
          },
        });
      }
    });
  });
});
