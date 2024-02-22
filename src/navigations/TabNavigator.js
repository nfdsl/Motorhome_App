import React from 'react';
import {createBottomTabNavigator} from '@react-navigation/bottom-tabs';
import HomeScreen from '../screens/homeScreen';
import ListScreen from '../screens/ListScreen';
import {colors, sizes} from '../components/Theme';
import {StyleSheet, Animated} from 'react-native';

const tabs = [
  {
    name: 'Home',
    screen: HomeScreen,
  },
  {
    name: 'List',
    screen: ListScreen,
  },
];

const Tab = createBottomTabNavigator();

const TabNavigator = () => {
  return (
    <>
      <Tab.Navigator
        initialRouteName="Home"
        screenOptions={{
          headerShown: false,
          tabBarShowLabel: false,
        }}>
        {tabs.map(({name, screen}, index) => {
          return (
            <Tab.Screen
              key={name}
              name={name}
              component={screen}
            />
          );
        })}

        
      </Tab.Navigator>
    </>
  );
};

export default TabNavigator;