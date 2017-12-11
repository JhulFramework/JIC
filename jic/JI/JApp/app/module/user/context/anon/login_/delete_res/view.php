
<style>
.signup_link a, .recovery_link a
{
	color:#a0a6ab;
	font-size: 20px;
}

.signup_link a:hover, .recovery_link a:hover
{
	color:#f0f6fb;
}

</style>

<div class="level columns">

	<div class="level-left column is-centered">
		<div class="level-item ">
			<div style="display:block;width:100%; background:#121212;">{{form}}</div>
		</div>
	</div>

	<div class="level-right column is-centered">
		<div class="level-item ">
			<div>
				<div class="signup_link" ><a href="{{signup_url}}" >नया खाता बनाए</a></div>
				<br/>
				<div class="recovery_link" ><a href="{{recovery_url}}">गुप्तशब्द भूल गए?</a></div>
			</div>
		</div>
	</div>

</div>
