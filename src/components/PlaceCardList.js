import React from 'react';
import { StyleSheet, Text, View, Image, Dimensions } from 'react-native';
import { AntDesign } from '@expo/vector-icons';

var width = Dimensions.get('window').width; //full width
var height = Dimensions.get('window').height; //full height

const PlaceCardList = () => {
  return (
    <View>
      <View style={styles.container}>
        <Image
          style={styles.cardImg}
          source={{
            uri: 'https://pbs.twimg.com/profile_images/1540772246116896768/h3P-vMIy_400x400.jpg',
          }}
        />
        <View style={styles.cardText} >
          <Text style={styles.cardTitle}>Local Placeholder </Text>
          <Text>Nkm de distância | Cidade, CD</Text>
          {/* TBD - Photo and comment icons*/}
        </View>
        <View style={{ flex: 1, alignSelf: 'flex-start' }}>
          {/* TBD - Heart Button becomes filled heart when favorited name="heart"*/}
          <AntDesign style={{ alignSelf: 'flex-end' }} name="hearto" size={24} color="black" />
        </View>
        {/* TBD - Star rating in bottom right*/}
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    borderWidth: 2,
    padding: 10,
    width: width,
    flexDirection: 'row',
    alignContent: 'flex-start',
    alignItems: 'left',
    backgroundColor: '#fff'
  },
  cardImg: {
    width: '25%',
    aspectRatio: 1,
    borderRadius: 5,
  },
  cardText: {
    alignSelf: 'flex-start'
  },
  cardTitle: {
    fontSize: 20,
    fontWeight: 'bold',
    flexWrap: 'wrap'
  },
  mainPlaceholder: {
    flex: 1,
    flexDirection: 'column'
  }
});

export default PlaceCardList;