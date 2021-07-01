import { MockedProvider } from '@apollo/client/testing'; // Use for Apollo Version 3+
// import { MockedProvider } from "@apollo/react-testing"; // Use for Apollo Version < 3

export const parameters = {
	actions: { argTypesRegex: '^on[A-Z].*' },
	controls: {
		matchers: {
			color: /(background|color)$/i,
			date: /Date$/
		}
	},
	backgrounds: {
		default: 'light',
		values: [
			{
				name: 'white',
				value: '#fff'
			},
			{
				name: 'light',
				value: '#d1d5db'
			},
			{
				name: 'dark',
				value: '#333333'
			},
			{
				name: 'extra-dark',
				value: '#1b1f23'
			}
		]
	},
	apolloClient: {
		MockedProvider
		// any props you want to pass to MockedProvider on every story
	}
};
