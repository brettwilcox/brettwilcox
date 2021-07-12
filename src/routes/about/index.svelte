<script>
	import { isLoading, _ } from "svelte-i18n";
</script>

<svelte:head>
	{#if $isLoading}
		<title>Loading...</title>
	{:else}
		<title>{$_("page.about.title")} - {$_("site.name")}</title>
	{/if}
</svelte:head>

{#if $isLoading}
	<h1>Loading...</h1>
{:else}
	<h1>{$_("page.about.title")} {$_("site.name")}</h1>
{/if}
