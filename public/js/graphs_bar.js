const DUMMY_DATA = [
    { id: 'd1', value: 10, region: 'USA' },
    { id: 'd2', value: 11, region: 'India' },
    { id: 'd3', value: 12, region: 'China' },
    { id: 'd4', value: 6, region: 'Germany' },
  ];

  let app_data = [];

  app_by_date.forEach(data => {
    app_data.push({date: (data['date_time']).substr(0,10), count: data['total']})
  });

  console.log(app_data);

  app_data = DUMMY_DATA;
  console.log(app_data);

  const xScale = d3
    .scaleBand()
    .domain(app_data.map((dataPoint) => dataPoint.region))
    .rangeRound([0, 250])
    .padding(0.1);
  const yScale = d3.scaleLinear().domain([0, 15]).range([200, 0]);
  
  const container = d3.select('#barChartApp');
  
  const bars = container
    .selectAll('.bar')
    .data(app_data)
    .enter()
    .append('rect')
    .classed('bar', true)
    .attr('fill', '#000')
    .attr('width', xScale.bandwidth())
    .attr('height', (data) => 200 - yScale(data.value))
    .attr('x', data => xScale(data.region))
    .attr('y', data => yScale(data.value));
  
//   setTimeout(() => {
//     bars.data(DUMMY_DATA.slice(0, 2)).exit().remove();
//   }, 2000);