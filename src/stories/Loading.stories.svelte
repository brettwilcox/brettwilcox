<script>
	import { Meta, Template, Story } from "@storybook/addon-svelte-csf";
	import Loading from "../components/loading.svelte";
</script>

<Meta
	title="Theme/Loading"
	component={Loading}
	argTypes={{
		label: { control: "text" },
		primary: { control: "boolean" },
		backgroundColor: { control: "color" },
		size: {
			control: { type: "select", options: ["small", "medium", "large"] },
		},
		onClick: { action: "onClick" },
	}}
/>

<Template let:args>
	<Template {...args} on:click={args.onClick} />
</Template>

<Story
	name="Loading Placeholder"
	args={{
		primary: true,
		label: "Button",
	}}
/>
