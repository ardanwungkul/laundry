import "./bootstrap";
import { initFlowbite } from "flowbite";
import Alpine from "alpinejs";
import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/dataTables.dataTables.min.css";
import "datatables.net-responsive-dt";
import "datatables.net-responsive-dt/css/responsive.dataTables.min.css";
import jquery from "jquery";

window.Alpine = Alpine;
window.$ = jquery;

Alpine.start();
initFlowbite();
