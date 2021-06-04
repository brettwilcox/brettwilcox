<script>
	import '../app.postcss';

	import { waitLocale } from 'svelte-i18n';

	export async function preload() {
		// awaits for the loading of the 'en-US' and 'en' dictionaries
		return waitLocale();
	}

</script>

<div>
	<nav>
		<a href="/">Home</a>
		<a href="/about">About</a>
		<a href="/settings">Settings</a>
		<a href="/admin">Admin</a>
		<a href="/login">Login</a>
	</nav>
</div>

<slot />
