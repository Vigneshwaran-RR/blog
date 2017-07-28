<style type="text/css">
.tr {
	text-align: center;
}
.control {
	margin-top: 40px;
}
</style>
<div class="container-fluid control">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-hover">
				<tr class="warning">
					<td> Feed </td> <td> Category </td> <td> Tag </td>
				</tr>
				<tr>
					<td class="success"> <label><a href="/<?php echo rootDir(); ?>?page=addfeed">Add new feed</a></label> </td>
					<td class="danger"> <label><a href="/<?php echo rootDir(); ?>?page=addcategory">Add new category</a></label> </td>
					<td class="info"> <label><a href="/<?php echo rootDir(); ?>?page=addtag">Add new tag</a></label> </td>
				</tr>
				<tr>
					<td class="success"> <label><a href="/<?php echo rootDir(); ?>?page=editfeed">Edit feed</a></label> </td>
					<td class="danger"> <label><a href="/<?php echo rootDir(); ?>?page=editcategory">Edit category</a></label> </td>
					<td class="info"> <label><a href="/<?php echo rootDir(); ?>?page=edittag">Edit tag</a></label> </td>
				</tr>
				<tr>
					<td class="success"> <label><a href="/<?php echo rootDir(); ?>?page=deletefeed">Delete feed</a></label> </td>
					<td class="danger"> <label><a href="/<?php echo rootDir(); ?>?page=deletecategory">Delete category</a></label> </td>
					<td class="info"> <label><a href="/<?php echo rootDir(); ?>?page=deletetag">Delete tag</a></label> </td>
				</tr>				
			</table>
		</div>
	</div>
</div>