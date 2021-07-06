<script>
	import "../app.postcss";

	import {
		register,
		isLoading,
		locale,
		locales,
		_,
		init,
		getLocaleFromNavigator,
	} from "svelte-i18n";

	register("en", () => import("../locales/en.json"));

	init({
		fallbackLocale: "en",
		initialLocale: getLocaleFromNavigator(),
	});
</script>

{#if $isLoading}

<div>
	<nav>
		Loading Nav...
	</nav>
</div>

{:else}

	<div>
		<nav>
			<a href="/">Home</a>
			<a href="/about">{$_("page.about.nav")}</a>
			<a href="/settings">Settings</a>
			<a href="/admin">Admin</a>
			<a href="/login">Login</a>
		</nav>
	</div>

{/if}

<select bind:value={$locale}>
	{#each $locales as locale}
		<option value={locale}>{locale}</option>
	{/each}
</select>

<slot />
