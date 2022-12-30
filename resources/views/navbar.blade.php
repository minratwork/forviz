<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="http://forviz.com/" class="brand-link">
            <span class="brand-text font-weight-bold ml-2">Forviz</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div id="current-role" class="info ml-2">
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <div id="menu-items"></div>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</html>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script>
    const baseUrl = '{{ env('APP_URL') }}';
    const menuListUrl = baseUrl + '/api/menu-list'

    $(document).ready(function() {
        var role = @json($role);
        getMenuList(role);
    });
    
    function getMenuList(role) {
        axios.get(menuListUrl, {
            params: {
                role: role
            }
        }).then((response) => {
            if (response && response.status == 200 && response.data.length > 0) {
                addMenuItems(response.data, role);
                updateDisplayRole(role);
            }
        }).catch((error) => {
            console.log("API ERROR" + error)
        })
    }

    function addMenuItems(menuList, role) {
        $('#menu-items').html("");
        
        menuList.forEach(menu => {
            var formattedUrl = menu.url + '?role=' + role
            var element = `<li class="nav-item">
                                <a href=${formattedUrl} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>${menu.name.toUpperCase()}</p>
                                </a>
                            </li>`
                            
            $('#menu-items').append(element);
        });
    }

    function updateDisplayRole(role) {
        $('#current-role').html("");
        const formattedRole = role.replace('_management', '_MNG');
        var currentRoleElement = `<span style="color: white">Role : ${formattedRole.toUpperCase()}</span>`
        $('#current-role').append(currentRoleElement);
    }
</script>