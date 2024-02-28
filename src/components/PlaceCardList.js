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
          <Text testID="cardTitle" style={styles.cardTitle}>Local Placeholder </Text>
          <Text testID="cardDesc" >Nkm de distância | Cidade, CD</Text>

          <View style={styles.details}>
            <View style={{ flexDirection: 'row', flex: 1, alignSelf: 'flex-end' }}>
              <AntDesign name="camera" size={24} color="black" />
              <AntDesign name="message1" size={24} color="black" />
            </View>
          </View>

          {/* TBD - Photo and comment icons*/}

        </View>
        <View style={{ flexDirection: 'column', flex: 1, alignSelf: 'flex-start', alignContent: 'flex-end' }}>
          {/* TBD - Heart Button becomes filled heart when favorited name="heart"*/}
          <AntDesign testID="heartButton" style={{ alignSelf: 'flex-end' }} name="hearto" size={24} color="black" />
          <View testID="starRating" style={{ flex: 1, alignSelf: 'flex-end', flexDirection: 'row' }}>
            <AntDesign style={{ alignSelf: 'flex-end' }} name="star" size={24} color="yellow" />
            <Text style={{ alignSelf: 'flex-end' }}> 4.7 </Text>
          </View>
        </View>
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
  details: {
    flex: 1,
    alignSelf: 'flex-start',
  },
  mainPlaceholder: {
    flex: 1,
    flexDirection: 'column'
  }
});

export default PlaceCardList;